@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">
                Categories
            </h2>

            <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Add Category
            </a>
        </div>


        <!-- Table -->
        <table class="w-full">

            <thead>
                <tr class="border-b">
                    <th class="text-left py-3">
                        Name
                    </th>

                    <th class="text-left py-3">
                        Type
                    </th>

                    <th class="text-left py-3">
                        Action
                    </th>
                </tr>
            </thead>


            <tbody>

                @forelse($categories as $category)
                    <tr class="border-b">

                        <td class="py-3">
                            {{ $category->name }}
                        </td>


                        <td class="py-3">

                            @if ($category->type == 'income')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Income
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                    Expense
                                </span>
                            @endif

                        </td>


                        <td class="py-3">

                            <div class="flex gap-2">

                                <!-- Edit -->
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah kamu yakin ingin menghapus category ini?')">

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
                        <td colspan="3" class="text-center py-5 text-gray-500">
                            No categories found
                        </td>
                    </tr>
                @endforelse


            </tbody>

        </table>

    </div>
@endsection
