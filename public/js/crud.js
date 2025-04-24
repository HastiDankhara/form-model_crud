function add() {
    $("#exampleModal").modal("show");
}
$(document).ready(function () {
    $("#btnsubmit").click(function (e) {
        e.preventDefault();
        // $.ajax({
        //     type: "POST",
        //     url: "{{ route('crud.store') }}",
        //     data: {
        //         name: $('#name').val(),
        //         email: $('#email').val(),
        //         city: $('#city').val(),
        //         age: $('#age').val(),
        //         _token: '{{ csrf_token() }}'
        //     },
        //     success: function(data) {
        //         console.log(data);
        //     },
        // })
    });
});
