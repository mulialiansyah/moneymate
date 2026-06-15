@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                Transactions
            </h2>

            <a href="{{ route('transactions.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">

                + Add Transaction

            </a>

        </div>


        <!-- Table -->
        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">
                        Date
                    </th>

                    <th class="text-left py-3">
                        Category
                    </th>

                    <th class="text-left py-3">
                        Type
                    </th>

                    <th class="text-left py-3">
                        Amount
                    </th>

                    <th class="text-left py-3">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse ($transactions as $transaction)
                    <tr class="border-b">

                        <!-- Date -->
                        <td class="py-3">
                            {{ $transaction->transaction_date }}
                        </td>


                        <!-- Category -->
                        <td class="py-3">
                            {{ $transaction->category->name }}
                        </td>


                        <!-- Type -->
                        <td class="py-3">

                            @if ($transaction->type == 'income')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                    Income

                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                    Expense

                                </span>
                            @endif

                        </td>


                        <!-- Amount -->
                        <td class="py-3">

                            Rp {{ number_format($transaction->amount, 0, ',', '.') }}

                        </td>


                        <!-- Action -->
                        <td class="py-3">

                            <div class="flex gap-2">

                                <a href="{{ route('transactions.edit', $transaction->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">

                                    Edit

                                </a>


                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>


                    </tr>


                @empty

                    <tr>

                        <td colspan="5" class="text-center py-5 text-gray-500">

                            No transactions found

                        </td>

                    </tr>
                @endforelse


            </tbody>

        </table>


    </div>
@endsection
