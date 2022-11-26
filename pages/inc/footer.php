
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });


    $(document).on('click' , '.add-to-card' , function (){
        let id  = $(this).data('idd')
        let name  = $(this).data('name')
        let price = $(this).data('price')

        $('#card-shop-body').prepend(`
             <tr>
                    <td><input type="text" value="${id}" name="products[${id}][id]" readonly style="width: 50px;border: none;"></td>
                    <td><input type="text" value="${name}" name="products[${id}][name]" readonly style="width: 50px;border: none;"></td>
                    <td><input type="text" value="${price}" name="products[${id}][price]" readonly style="width: 50px;border: none;"></td>
                    <td><input type="number" value="1" name="products[${id}][quantity]" style="width: 50px;"></td>
                    <th class="delete-row" style="color:red;cursor:pointer">X</th>
             </tr>
        `)
    })

    $(document).on('click' , '.delete-row' , function (){
        var whichtr = $(this).closest("tr");
        whichtr.remove();
    })

    $(document).on('click' , '#delete-all-row' , function (){
        $("#card-shop-body").empty();
    })

</script>
</body>
</html>
