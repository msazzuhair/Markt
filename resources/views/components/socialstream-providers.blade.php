<div class="text-center mb-3">
    <h6 class="text-gray-600 text-sm font-bold">
        Sign in with
    </h6>
</div>
<div class="flex items-center justify-center flex-wrap">
    @if (JoelButcher\Socialstream\Socialstream::hasFacebookSupport())
        <a
            href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::facebook()]) }}"
            class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
            style="transition: all 0.15s ease 0s;"
        >
            <x-facebook-icon class="text-blue-500 h-5 w-5 mr-1" />
            <span>Facebook</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasGoogleSupport())
        <a
            href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::google()]) }}"
            class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
            style="transition: all 0.15s ease 0s;"
        >
            <img
                alt="..."
                class="w-5 mr-1"
                src="{{ asset('storage/google.svg') }}" />
            <span>Google</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasTwitterSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::twitter()]) }}">
            <x-twitter-icon class="h-6 w-6 mx-2" />
            <span class="sr-only">Twitter</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasLinkedInSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::linkedin()]) }}">
            <x-linked-in-icon class="h-6 w-6 mx-2" />
            <span class="sr-only">LinkedIn</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasGithubSupport())
        <a
            href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::github()]) }}"
            class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
            style="transition: all 0.15s ease 0s;"
        >
            <img
                alt="..."
                class="w-5 mr-1"
                src="{{ asset('storage/github.svg') }}" />
            <span>Github</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasGitlabSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::gitlab()]) }}">
            <x-gitlab-icon class="h-6 w-6 mx-2" />
            <span class="sr-only">GitLab</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasBitbucketSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::bitbucket()]) }}">
            <x-bitbucket-icon />
            <span class="sr-only">BitBucket</span>
        </a>
    @endif
</div>
<hr class="mt-6 border-b-1 border-gray-400" />
