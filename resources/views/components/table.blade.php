

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

    <table class="table table-sm">
        <thead>
            <tr>
                <th>Statistics</th>
                <th>#1</th>
                <th>#2</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                @foreach($student as $key)
               <td>
                       {{$key}}
                </td>
                   @endforeach
                  </tr>
            @endforeach
        </tbody>
    </table>
</div>
