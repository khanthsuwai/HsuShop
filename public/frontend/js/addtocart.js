$(document).ready(function () {

    count();

    function count() {
        let itemString = localStorage.getItem('shops');
        if (itemString) {
            let itemArray = JSON.parse(itemString);

            if (itemArray != null) {
                $('#count_item').text(itemArray.length);
            }
        }
    }

    $('.addToCart').click(function () {
        // alert('Hello');

        // add to cart
        let id = $(this).data('id');
        let name = $(this).data('name');
        let codeNo = $(this).data('codeno');
        let price = $(this).data('price');
        let discount = $(this).data('discount');
        let qty = $('.qty').val();

        // console.log(id,name,codeNo,price,discount);

        let itemObj = {
            id: id,
            name: name,
            codeNo: codeNo,
            price: price,
            discount: discount,
            qty: qty
        }
        // console.log(itemObj);
        let itemString = localStorage.getItem('shops');
        let itemArray;
        if (itemString == null) {
            itemArray = [];
        } else {
            itemArray = JSON.parse(itemString);
        }

        let status = false;
        $.each(itemArray, function (i, v) {
            if (id == v.id) {
                status = true;
                v.qty = Number(v.qty) + Number(qty);
            }
        })

        if (status == false) {
            itemArray.push(itemObj);
        }

        let itemData = JSON.stringify(itemArray);
        localStorage.setItem('shops', itemData);

        count();

    })

    getData();
    function getData() {
        let itemString = localStorage.getItem('shops');
        if (itemString) {
            let itemArray = JSON.parse(itemString);

            let data = '';
            let k = 1;
            let total = 0;
            $.each(itemArray, function (i, v) {

                let discountPrice = v.price - ((v.discount / 100) * v.price);
                console.log(discountPrice);

                data += `<tr>
                            <td>${k++}</td>
                            <td>${v.codeNo}</td>
                            <td>${v.name}</td>
                            <td>${v.price}</td>
                            <td>${v.discount}%</td>

                            <td>
                                <button class="btn btn-sm bg-primary min" data-key="${i}"> - </button>
                                ${v.qty}
                                <button class="btn btn-sm bg-primary max" data-key="${i}"> + </button>
                            </td>
                            <td>$ ${discountPrice * v.qty}</td>
                        </tr>`;
                total += discountPrice * v.qty;
            });
            data += `<tr>
                        <td colspan="6">Total</td>
                        <td> $ ${total}</td>
                    </tr>`;

            console.log(data);
            $('#itemTbody').html(data);
        }
    }

    $('#itemTbody').on('click', '.min', function () {
        // alert('Hello');
        let key = $(this).data('key');
        console.log(key);

        let itemString = localStorage.getItem('shops');
        if (itemString) {
            let itemArray = JSON.parse(itemString);

            $.each(itemArray, function (i, v) {
                if (key == i) {
                    v.qty--;
                    if (v.qty == 0) {
                        itemArray.splice(key, 1);
                    }
                }
            })

            let itemData = JSON.stringify(itemArray);
            localStorage.setItem('shops', itemData);

            getData();
        }

    })

    $('#itemTbody').on('click', '.max', function () {
        // alert('Hello');
        let key = $(this).data('key');
        console.log(key);

        let itemString = localStorage.getItem('shops');
        if (itemString) {
            let itemArray = JSON.parse(itemString);

            $.each(itemArray, function (i, v) {
                if (key == i) {
                    v.qty++;
                }
            })

            let itemData = JSON.stringify(itemArray);
            localStorage.setItem('shops', itemData);

            getData();
        }

    })

    $('#order_now').click(function () {
        let ans = confirm('Are you sure order?');
        if (ans) {
            localStorage.removeItem('shops');
            window.location.href = 'index.html';
        }
    })

});
