<section class="py-8 px-4 mx-auto max-w-2xl bg-white rounded-lg shadow-md">
   <header class="pb-6 mb-6 border-b">
       <h2 class="text-2xl font-bold text-gray-900">Profile Information</h2>
       <p class="mt-2 text-gray-600">Update your account's profile information and email address.</p>
   </header>

   <form id="send-verification" method="post" action="{{ route('verification.send') }}">
       @csrf
   </form>

   <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
       @csrf
       @method('patch')

       <div class="mb-6">
           <label for="name" class="block mb-2 font-medium">Name</label>
           <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                  required>
           @error('name')
               <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
           @enderror
       </div>

       <div class="mb-6">
           <label for="email" class="block mb-2 font-medium">Email</label>
           <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                  required>
           @error('email')
               <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
           @enderror

           @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
               <div class="mt-3 p-4 bg-yellow-50 rounded-md">
                   <p class="text-sm text-yellow-700">
                       Your email address is unverified.
                       <button form="send-verification" 
                               class="ml-1 text-orange-600 hover:underline focus:outline-none">
                           Click here to re-send the verification email.
                       </button>
                   </p>

                   @if (session('status') === 'verification-link-sent')
                       <p class="mt-2 text-sm text-green-600">
                           A new verification link has been sent to your email address.
                       </p>
                   @endif
               </div>
           @endif
       </div>

       <div class="flex items-center gap-4 pt-4">
           <button type="submit" 
                   class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500">
               Save Changes
           </button>

           @if (session('status') === 'profile-updated')
               <p x-data="{ show: true }"
                  x-show="show"
                  x-transition
                  x-init="setTimeout(() => show = false, 2000)"
                  class="text-sm text-green-600">
                   Saved successfully!
               </p>
           @endif
       </div>
   </form>
</section>