@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-2xl font-bold mb-6">
            Edit Transaction
        </h2>

        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">

            @csrf
            @method('PUT')

            <!-- Category -->
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Category
                </label>

                <select 
                    name="category_id"
                    class="w-full border rounded-lg px-4 py-2">

                    @foreach ($categories as $category)

                        <option 
                            value="{{ $category->id }}"
                            {{ $transaction->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            <!-- Type -->
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Type
                </label>

                <select 
                    name="type"
                    class="w-full border rounded-lg px-4 py-2">

                    <option value="income"
                        {{ $transaction->type == 'income' ? 'selected' : '' }}>
                        Income
                    </option>

                    <option value="expense"
                        {{ $transaction->type == 'expense' ? 'selected' : '' }}>
                        Expense
                    </option>

                </select>

            </div>


            <!-- Amount -->
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Amount
                </label>

                <input 
                    type="number"
                    name="amount"
                    value="{{ $transaction->amount }}"
                    class="w-full border rounded-lg px-4 py-2">

            </div>


            <!-- Date -->
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Transaction Date
                </label>

                <input 
                    type="date"
                    name="transaction_date"
                    value="{{ $transaction->transaction_date }}"
                    class="w-full border rounded-lg px-4 py-2">

            </div>


            <!-- Description -->
            <div class="mb-6">

                <label class="block mb-2 font-medium">
                    Description
                </label>

                <textarea 
                    name="description"
                    class="w-full border rounded-lg px-4 py-2">{{ $transaction->description }}</textarea>

            </div>


            <div class="flex gap-3">

                <button 
                    type="submit"
                    class="bg-yellow-500 text-white px-5 py-2 rounded-lg">

                    Update

                </button>

                <a 
                    href="{{ route('transactions.index') }}"
                    class="bg-gray-500 text-white px-5 py-2 rounded-lg">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection