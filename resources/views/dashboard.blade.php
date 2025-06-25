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
                    {{ __("You're logged in Food Panda App") }}
                </div>
            </div>
                  <form method="POST" action="{{ route('logout') }}">
                 @csrf
             <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                     Logout
             </button>
           </form>
        </div>
    
    </div>

  
</x-app-layout>
