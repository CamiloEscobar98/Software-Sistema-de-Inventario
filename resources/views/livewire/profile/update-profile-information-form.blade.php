<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

use Livewire\Volt\Component;

use App\Enums\UserEnum;
use App\Enums\UserPersonalInformationEnum;

use App\Repositories\UserPersonalInformationRepository;
use App\Repositories\GenderRepository;
use App\Repositories\CivilStatusRepository;

use App\Models\User;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $birthdate = '';
    public int $gender_id = -1;
    public int $civil_status_id = -1;

    public $genders = [];
    public $civilStatuses = [];

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $personalInformation = Auth::user()->{UserEnum::RELATION_PERSONAL_INFORMATION};

        $this->{UserPersonalInformationEnum::NAME} = $personalInformation->{UserPersonalInformationEnum::NAME} ?? '';
        $this->{UserPersonalInformationEnum::EMAIL} = $personalInformation->{UserPersonalInformationEnum::EMAIL} ?? '';
        $this->{UserPersonalInformationEnum::BIRTHDATE} = $personalInformation->{UserPersonalInformationEnum::BIRTHDATE} ?? '';
        $this->{UserPersonalInformationEnum::GENDER_ID} = $personalInformation->{UserPersonalInformationEnum::GENDER_ID} ?? -1;
        $this->{UserPersonalInformationEnum::CIVIL_STATUS_ID} = $personalInformation->{UserPersonalInformationEnum::CIVIL_STATUS_ID} ?? -1;

        $this->getGenders();
        $this->getCivilStatuses();
    }

    public function getGenders() {
        /** @var GenderRepository $genderRepository */
        $genderRepository = resolve(GenderRepository::class);

        $this->genders = $genderRepository->getSimpleData();
    }

    public function getCivilStatuses() {
        /** @var CivilStatusRepository $civilStatusRepository */
        $civilStatusRepository = resolve(CivilStatusRepository::class);

        $this->civilStatuses = $civilStatusRepository->getSimpleData();
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            UserPersonalInformationEnum::NAME => ['required', 'string', 'max:255'],
            UserPersonalInformationEnum::EMAIL => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            UserPersonalInformationEnum::BIRTHDATE => ['required', 'date', 'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')],
        ]);

        $personalInformation = $user->{UserEnum::RELATION_PERSONAL_INFORMATION};

        if ($personalInformation) {
            $personalInformation->fill($validated);
        } else {
            /** @var UserPersonalInformationRepository $userPersonalInformationRepository */
            $userPersonalInformationRepository = resolve(UserPersonalInformationRepository::class);
            $personalInformation = $userPersonalInformationRepository->create($validated);
            $user->{UserEnum::PERSONAL_INFORMATION_ID} = $personalInformation->{UserPersonalInformationEnum::ID};
            $user->save();
        }

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Profile Information Text") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required
                autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !
            auth()->user()->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    {{ __('Your email address is unverified.') }}

                    <button wire:click.prevent="sendVerification"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <!-- Birthdate -->
        <div>
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input wire:model="birthdate" id="birthdate" name="birthdate" type="date" class="mt-1 block w-full"
                required autofocus autocomplete="birthdate" />
            <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender_id" :value="__('Gender')" />
            <x-select wire:model="gender_id" id="gender_id" name="gender_id" class="mt-1 block w-full">
                <option value="-1">{!! __('Select') !!}</option>
                @foreach ($this->genders as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('gender_id')" />
        </div>
        
        <!-- Civil Status -->
        <div>
            <x-input-label for="civil_status_id" :value="__('Civil Status')" />
            <x-select wire:model="civil_status_id" id="civil_status_id" name="civil_status_id" class="mt-1 block w-full">
                <option value="-1">{!! __('Select') !!}</option>
                @foreach ($this->civilStatuses as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('civil_status_id')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>