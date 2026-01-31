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
                   <h3>{{'Show order'}}</h3>
                   <h3>{{'the user '.$user->name.' order'}}</h3>
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

                                @foreach($order->products as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td>{{$item->pivot->quantity}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>

                                              <form action="" method="POST" style="display:inline;">
                                                      @csrf
                                                      @method('DELETE')
                                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا از حذف محصول اطمینان دارید؟')">
                                                              Delete
                                                          </button>
                                              </form>
                                                    <a href="">
                                                          <button class="btn btn-warning btn-sm">Edit</button>
                                                    </a>

                                        </td>
                                    </tr>
                                @endforeach
                          </tbody>
                        </table>
                </div>
    
            </div>
    </div>

</x-app-layout>
