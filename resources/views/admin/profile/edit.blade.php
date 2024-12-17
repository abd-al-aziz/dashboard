@include('layouts.header')

<div class="py-12 bg-gray-900 text-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Update Profile Information -->
        <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
            <h2 class="text-xl font-semibold leading-tight text-gray-100 mb-4">
                تحديث معلومات الملف الشخصي
            </h2>
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password -->
        <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
            <h2 class="text-xl font-semibold leading-tight text-gray-100 mb-4">
                تحديث كلمة المرور
            </h2>
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete User -->
        <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
            <h2 class="text-xl font-semibold leading-tight text-red-400 mb-4">
                حذف الحساب
            </h2>
            <p class="text-sm text-gray-400 mb-4">
                يرجى ملاحظة أن حذف الحساب لا يمكن التراجع عنه.
            </p>
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
