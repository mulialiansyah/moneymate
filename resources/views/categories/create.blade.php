@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-2xl font-bold mb-6">
            Add New Category
        </h2>


        <form action="{{ route('categories.store') }}" method="POST">

            @csrf

            <!-- Name -->
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Category Name
                </label>

                <input 
                    type="text"
                    name="name"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Example: Salary">

            </div>


            <!-- Type -->
            <div class="mb-6">

                <label class="block mb-2 font-medium">
                    Type
                </label>

                <select 
                    name="type"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="income">
                        Income
                    </option>

                    <option value="expense">
                        Expense
                    </option>

                </select>

            </div>


            <!-- Button -->
            <div class="flex gap-3">

                <button 
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Save

                </button>


                <a 
                    href="{{ route('categories.index') }}"
                    class="bg-gray-400 text-white px-5 py-2 rounded-lg hover:bg-gray-500">

                    Back

                </a>

            </div>

        </form>

    </div>

</div>

@endsection