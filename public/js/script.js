$(document).ready(function() {
    $('#search, #min_age, #max_age').on('keyup change', function() {
        let search = $('#search').val();
        let min_age = $('#min_age').val();
        let max_age = $('#max_age').val();

        $.ajax({
            url: "{{ route('index') }}",
            method: "GET",
            data: { search: search, min_age: min_age, max_age: max_age },
            success: function(response) {
                $('#student-table').html(response);
            }
        });
    });
});

