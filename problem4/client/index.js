
// get existing products
$(document).ready(() => {
    getProducts();
    $("#edit").toggle();
})

// create new product
$(document).on('click', '#createProduct', (e) => {
    console.log($('#name').val());
    $.ajax({
        url: "http://localhost/mpm_challenge/problem4/createProduct.php",
        type: "POST",
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: {
            name: $('#name').val(),
            weight: $('#weight').val(),
            base: $('#base').val(),
            height: $('#height').val(),
            width: $('#width').val(),
        },
        success: function (res) {
            $('#products').append(`
                                <tr>
                                <td>${res.id}</td>
                                <td>${res.name}</td>
                                <td>${res.weight}</td>
                                <td>${res.base}</td>
                                <td>${res.height}</td>
                                <td>${res.width}</td>
                                <td><button id="${res.id}" type="button" class="btn btn-success btn-sm">edit</button></td>
                                </tr>
                    `);

        },
        error: (res) => {
            alert("Product Creation Failed")
            console.log(res);
        }
    });
})


// edit product handle
$(document).on('click', '.btn-success', (e) => {
    console.log(e.target.parentElement.parentElement.children);
    $("#edit").toggle();
    $("#create").toggle();
    $("#id").val(e.target.parentElement.parentElement.children[0].innerHTML);
    $("#eName").val(e.target.parentElement.parentElement.children[1].innerHTML);
    $("#eWeight").val(e.target.parentElement.parentElement.children[2].innerHTML);
    $("#eBase").val(e.target.parentElement.parentElement.children[3].innerHTML);
    $("#eWidth").val(e.target.parentElement.parentElement.children[5].innerHTML);
    $("#eHeight").val(e.target.parentElement.parentElement.children[4].innerHTML);
})

// update Product call
$(document).on('click', '#editProduct', (e) => {
    console.log($('#name').val());
    $.ajax({
        url: "http://localhost/mpm_challenge/problem4/updateProduct.php",
        type: "POST",
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: {
            id: $('#id').val(),
            name: $('#eName').val(),
            weight: $('#eWeight').val(),
            base: $('#eBase').val(),
            height: $('#eHeight').val(),
            width: $('#eWidth').val(),
        },
        success: function (res) {
            let rows = ``;
            for (let i in res) {
                rows += `<tr>
                            <td>${res[i].id}</td><td>${res[i].name}</td>
                            <td>${res[i].weight}</td>
                            <td>${res[i].base}</td>
                            <td>${res[i].height}</td>
                            <td>${res[i].width}</td>
                            <td><button id="${res.id}" type="button" class="btn btn-success btn-sm">edit</button></td>
                        </tr>`
            }
            const body = $(`<tbody id="products"></tbody>`).append(rows);
            $("#products").replaceWith(body);
            // alert("Product Updated");
            $("#edit").toggle();
            $("#create").toggle();

        },
        error: (res) => {
            console.log(res);
            alert("There was an error please try again");
            console.log(res);
        }
    });
});

// handle edit cancel
$(document).on('click', '#cancel', () => {
    $("#edit").toggle();
    $("#create").toggle();
})

// get the existing products to append to the table
function getProducts() {
    $.ajax({
        url: "http://localhost/mpm_challenge/problem4/getProducts.php",
        type: "GET",
        dataType: 'json',
        success: function (res) {
            for (let i in res) {
                $('#products').append(`
                                <tr>
                                <td>${res[i].id}</td>
                                <td>${res[i].name}</td>
                                <td>${res[i].weight}</td>
                                <td>${res[i].base}</td>
                                <td>${res[i].height}</td>
                                <td>${res[i].width}</td>
                                <td><button id="${res.id}" type="button" class="btn btn-success btn-sm">edit</button></td>
                                </tr>
                    `)
            }
            console.log(res);


        },
        error: (res) => {
            console.log(res);
            alert("There was an error please try again");
        }
    });
}
