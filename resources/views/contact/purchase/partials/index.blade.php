<section>
    <div class="relative isolate bg-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
          <div class="relative px-6 lg:static">
            <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
              <h2 class="text-pretty text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl">I also purchase items!</h2>
              <p class="mt-6 text-lg/8 text-gray-600">
                There are several ways to get in touch with us. Below you’ll find our contact details, but you can also easily fill out the contact form. As soon as we receive your message, we’ll do our best to respond as quickly as possible.
              <dl class="mt-10 space-y-4 text-base/7 text-gray-600">
                <div class="flex gap-x-4">
                  <dt class="flex-none">
                    <span class="sr-only">Telephone</span>
                    <svg class="h-7 w-6 text-navBackground" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                  </dt>
                  <dd><a class="hover:text-gray-900" href="tel:{{ $business->business_phone_number }}">{{ $business->business_phone_number }} (WhatsApp)</a></dd>
                </div>
                <div class="flex gap-x-4">
                  <dt class="flex-none">
                    <span class="sr-only">Email</span>
                    <svg class="h-7 w-6 text-navBackground" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                  </dt>
                  <dd><a class="hover:text-gray-900" href="mailto:hello@example.com">{{ $business->business_email }}</a></dd>
                </div>
              </dl>
            </div>
          </div>
          <form action="{{ route('contact.purchases.message') }}" method="POST" class="px-6">
            @csrf
            <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
              <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                  <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">First name</label>
                  <div class="mt-2.5">
                    <x-text-input id="first-name" class="block mt-1 w-full" type="text" name="first-name" :value="old('first-name')" required autocomplete="username" />
                  </div>
                  <x-input-error :messages="$errors->get('first-name')" class="mt-2" />
                </div>
                <div>
                  <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Last name</label>
                  <div class="mt-2.5">
                   <x-text-input id="last-name" class="block mt-1 w-full" type="text" name="last-name" :value="old('last-name')" required autocomplete="username" />
                  </div>
                  <x-input-error :messages="$errors->get('last-name')" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                  <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                  <div class="mt-2.5">
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                  </div>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                  <label for="message" class="block text-sm/6 font-semibold text-gray-900">Message</label>
                  <div class="mt-2.5">
                    <textarea name="message" id="message" rows="4" class="bg-[#F3F5F7] border-[#F3F5F7]/80 block w-full rounded-md px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2"></textarea>
                  </div>
                  <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>
              </div>



              <div class="mt-8 flex flex-col lg:flex-row justify-between gap-2">
                {{-- captcha --}}
                <div class="flex flex-col">
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
                </div>

                {{-- submit --}}
                <button type="submit" class="w-full rounded-md bg-navBackground px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-navBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Send message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
</section>
