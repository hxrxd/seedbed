<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Gracias por registrarte! Te hemos enviado un correo a '.Auth::user()->email.'. Por  favor, haz clic en el enlace para activar tu usuario. Puede que esto tarde unos minutos o llegue a tu bandeja de spam. Si no recibiste el correo electrónico, haz clic en el botón "Reenviar".') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button class="text-indigo-800 bg-[#e9f877] hover:bg-[#f7fdcf] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                    {{ __('Reenviar verificación de Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>
</x-guest-layout>
