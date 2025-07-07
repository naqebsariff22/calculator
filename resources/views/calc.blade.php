<x-layout>
    <x-slot:heading>
        Calculator
    </x-slot:heading>
    <div class="relative bg-gray-900 bg-[url('/images/calcbg.jpg')] bg-cover bg-center bg-no-repeat overflow-hidden">
    <div class="container">

        <!-- Calculator box -->
        <div class="calculator-box">
            <h2 class="text-center text-2xl font-semibold mb-4">Calculator</h2>
            <form method="POST" action="{{ route('calc.calculate') }}" class="space-y-4">
                @csrf
                <div class="flex items-center space-x-3">
                    <input type="number" name="num1" value="{{ session('editing') === null ? old('num1') : '' }}" class="flex-1 border border-gray-300 p-2 rounded">
                    <select name="operator" class="w-16 border border-gray-300 p-2 rounded text-center">
                        <option value="+">+</option>
                        <option value="-">−</option>
                        <option value="*">×</option>
                        <option value="/">÷</option>
                    </select>
                    <input type="number" name="num2" step="any" required value="{{ old('num2') }}"class="flex-1 border border-gray-300 p-2 rounded">
                </div>
                    <button type="submit" class="w-full bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">Submit</button>
            </form>

            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @elseif(session('result'))
                <p class="result">Result: {{ session('result') }}</p>
            @endif
        </div>

        <!-- History box -->
        <div class="history-box">
            <h2 class="text-center text-2xl font-semibold mb-4">Calculation History</h2>
            @if(session('history') && count(session('history')) > 0)
                <table>
                    <tr>
                        <th>Formula</th>
                        <th>Result</th>
                        <th>Actions</th>
                    </tr>
                    @php $editing = session('editing'); @endphp
                    @foreach(session('history') as $i => $entry)
                        @if((int) session('editing', -1) === $i)
                            @php $parts = explode(' ', $entry['equation']); @endphp
                            <tr>
                                <form method="POST" action="{{ route('calc.update', $i) }}">
                                    @csrf
                                    <td>
                                        <input type="number" name="edit_num1" value="{{ $parts[0] }}" required>
                                        <select name="edit_operator">
                                            <option value="+" {{ $parts[1] == '+' ? 'selected' : '' }}>+</option>
                                            <option value="-" {{ $parts[1] == '-' ? 'selected' : '' }}>−</option>
                                            <option value="*" {{ $parts[1] == '*' ? 'selected' : '' }}>×</option>
                                            <option value="/" {{ $parts[1] == '/' ? 'selected' : '' }}>÷</option>
                                        </select>
                                        <input type="number" name="edit_num2" value="{{ $parts[2] }}" required>
                                            </td>
                                            <td>{{ $entry['result'] }}</td>
                                                <td>
                                                <button type="submit" class="save">Save</button>
                                        </form>
                                            
                                        <form method="POST" action="{{ route('calc.cancel') }}" style="display:inline">
                                            @csrf
                                            <button class="edit" type="submit">Cancel</button>
                                        </form>
                                    </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $entry['equation'] }}</td>
                                <td>{{ $entry['result'] }}</td>
                                <td style="display: flex; gap: 6px;">

                                    <form method="POST" action="{{ route('calc.edit', $i) }}">
                                        @csrf
                                        <button class="edit" type="submit">Edit</button>
                                    </form>

                                    <form method="POST" action="{{ route('calc.delete', $i) }}" onsubmit="return confirm('Delete this entry?')">
                                        @csrf
                                        <button class="delete" type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endif
                    @endforeach
                </table>
            @else
                <p class="text-center">No history yet.</p>
            @endif
        </div>
    </div>
</div>
</x-layout>
