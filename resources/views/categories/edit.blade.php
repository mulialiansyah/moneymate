@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-2xl font-bold mb-6">
            Edit Category
        </h2>


        <form action="{{ route('categories.update', $category->id) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Category Name
                </label>

                <input 
                    type="text"
                    name="name"
                    value="{{ $category->name }}"
                    class="w-full border rounded-lg px-4 py-2">

            </div>


            <div class="mb-6">

                <label class="block mb-2 font-medium">
                    Type
                </label>

                <select 
                    name="type"
                    class="w-full border rounded-lg px-4 py-2">

                    <option value="income"
                        {{ $category->type == 'income' ? 'selected' : '' }}>
                        Income
                    </option>


                    <option value="expense"
                        {{ $category->type == 'expense' ? 'selected' : '' }}>
                        Expense
                    </option>

                </select>

            </div>


            <div class="flex gap-3">

                <button 
                    type="submit"
                    class="bg-yellow-500 text-white px-5 py-2 rounded-lg">

                    Update

                </button>


                <a 
                    href="{{ route('categories.index') }}"
                    class="bg-gray-500 text-white px-5 py-2 rounded-lg">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection