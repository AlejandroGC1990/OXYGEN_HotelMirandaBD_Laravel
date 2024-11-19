<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    
<table class="min-w-full border-collapse border border-gray-200 bg-white shadow-md rounded-lg border">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach(array_keys($data[0]) as $column)
                @if ($column !== 'created_at' && $column !== 'updated_at')
                    <th scope="col" class="px-6 py-3 text-left font-medium bg-red-500 text-white">
                        {{ ucfirst($column) }}
                    </th>
                @endif
            @endforeach
            
            <th scope="col" class="px-6 py-3 text-left font-medium bg-red-500 text-white">
                Detalles
            </th>
        </tr>
    </thead>
    <tbody>
        @dd($data)
        @foreach($data as $row)
        <tr class="bg-white hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
            @foreach($row as $key => $value)
                @if ($key !== 'created_at' && $key !== 'updated_at')
                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300 border-b border-gray-200">
                        {{ $value }}
                    </td>
                @endif
            @endforeach

            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300 border-b border-gray-200">
                <a href="{{ route(request()->segment(1) . '.show', $row['id']) }}" 
                   class="text-blue-500 hover:text-blue-700">
                    Info
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>