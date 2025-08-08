@extends(
    "auth.layouts.app",
    [
        "title" => "Psikotes Berbinar",
    ]
)

@section("content")
    <section>
        <div class="relative w-screen bg-[#BFE2F4]">
            <img src="{{ asset("/assets/auth/images/abstractwallpaper.png") }}" alt="" title="" class="h-screen w-screen object-cover" />

            <div class="flex flex-col items-center justify-center">
                <div class="flex justify-center">
                    <img src="{{ asset("/assets/auth/images/logo-psikotes.png") }}" alt="" title="" class="absolute top-5 w-fit" />
                </div>

                <div class="bottom-0 top-0 flex justify-center">
                    <div class="absolute bottom-0 top-0 my-36 h-[380px] w-[300px] gap-4 rounded-xl bg-white/10 shadow-lg ring-1 ring-black/5 backdrop-blur-md md:h-[380px] md:w-[400px]">
                        <div class="p-5">
                            <div class="mt-3">
                                <p class="text-2xl font-extrabold text-black">LOGIN</p>
                            </div>
                            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                                <form class="space-y-6" method="POST" action="{{ route("auth.authenticate") }}">
                                    @csrf
                                    <input type="hidden" name="login_type" value="user" />

                                    <div>
                                        <label for="username" class="block text-base font-semibold leading-6 text-black">Username</label>
                                        <div class="mt-2">
                                            <input id="username" name="username" type="text" required class="block w-full rounded-full border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" value="{{ old("username") }}" autofocus />
                                        </div>
                                    </div>

                                    <div>
                                        <div class="flex items-center justify-between">
                                            <label for="password" class="block text-base font-semibold leading-6 text-black">Password</label>
                                            <div class="text-sm"></div>
                                        </div>
                                        <div class="mt-2">
                                            <input id="password" name="password" type="password" required class="block w-full rounded-full border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" />
                                        </div>
                                    </div>

                                    <div class="mx-auto flex items-center justify-center py-3">
                                        <button type="submit" class="hover:shadow-primary-alt flex w-fit justify-center rounded-full border-2 border-primary bg-primary px-7 py-1.5 text-base font-semibold leading-6 text-white shadow-sm hover:shadow-lg focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
