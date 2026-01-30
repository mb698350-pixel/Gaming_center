<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h3>{{'Show_order'}}</h3>
                   <h3>{{'سفارش های کاربر'.$user->name}}</h3>
                    </div>
                    <h5>{{'Products'}}</h5>

                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">نام</th>
                              <th scope="col">دسته بندی</th>
                              <th scope="col">تعداد سفارش</th>
                              <th scope="col">قیمت</th>
                              <th scope="col">تنظیمات</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                </div>
    
            </div>
    </div>

</x-app-layout>
