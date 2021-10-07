<div>
    {{ __('Сесії браузера') }}

    {{ __('Керуйте активними сеансами та виходьте з них у інших браузерах та на пристроях.') }}

    <div>
        {{ __('If necessary, you may logout of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
    </div>

    @if (count($this->sessions) > 0)
        <div class="mt-3">
            @foreach ($this->sessions as $session)
                <div class="d-flex mb-2">
                    <div class="w-5">
                        @if ($session->agent->isDesktop())
                            <span><svg fill="none" height="35" viewBox="0 0 576 512"><path fill="currentColor" d="M528 0H48C21.5 0 0 21.5 0 48v288c0 26.5 21.5 48 48 48h192l-24 96h-72c-8.8 0-16 7.2-16 16s7.2 16 16 16h288c8.8 0 16-7.2 16-16s-7.2-16-16-16h-72l-24-96h192c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM249 480l16-64h46l16 64h-78zm295-144c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h480c8.8 0 16 7.2 16 16v288z"></path></svg></span>
                        @else
                            <span class="ms-2"><svg fill="none" height="35" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M192 416c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zM320 48v416c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h224c26.5 0 48 21.5 48 48zm-32 0c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v416c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V48z"></path></svg></span>
                        @endif
                    </div>

                    <div class="ms-2">
                        <div>
                            {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                        </div>

                        <div>
                            <div class="small font-weight-lighter text-muted">
                                {{ $session->ip_address }},

                                @if ($session->is_current_device)
                                    <span class="text-success font-weight-bold">{{ __('This device') }}</span>
                                @else
                                    {{ __('Last active') }} {{ $session->last_active }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="d-flex mt-3">
        <button wire:click="$emit('confirmLogout');" wire:loading.attr="disabled" class="btn btn-danger">
            {{ __('Logout Other Browser Sessions') }}
        </button>

        <x-modal.dialog-modal id="confirmingLogoutModal">
            <x-slot name="title">
                {{ __('Logout Other Browser Sessions') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Please enter your password to confirm you would like to logout of your other browser sessions across all of your devices.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input.input type="password" placeholder="{{ __('Password') }}"
                                 x-ref="password"
                                 class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                 wire:model.defer="password"
                                 wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-input.error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled"
                                        data-bs-dismiss="modal">
                    {{ __('Nevermind') }}
                </x-secondary-button>

                <x-button class="ms-2" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled"
                              data-bs-dismiss="modal">
                    {{ __('Logout Other Browser Sessions') }}
                </x-button>
            </x-slot>
        </x-modal.dialog-modal>
    </div>
    @push('scripts')
        <script>
            Livewire.on('confirmLogout', () => {
                var myModal = new bootstrap.Modal(document.getElementById('confirmingLogoutModal'))
                myModal.toggle()
            })
        </script>
    @endpush
</div>
