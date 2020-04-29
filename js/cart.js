//когда страница полностью загрузится, 
$(document).ready(function () {
    loadCart();
});

var cart = {}; //переменная для хранения товаров в корзине и их количества
var cost = new Map([]); //переменная для хранения стоимости товаров из корзины

//подсчитываем общее количество товаров в корзине
function totalCountCart(){
    var k = 0;
    for(var key in cart){
        k += cart[key];
    }
    return k;
}

//подсчитываем общую стоимость товаров в корзине
function totalCostCart(){
    var k = 0;
    for(var id in cart){
        k += cart[id] * cost.get(id);
    }
    return k;
}

//читаем товары из корзины
function loadCart(){
    //проверяем, есть ли в хранилище запись cart
    if (localStorage.getItem('cart')){
        //если есть - расшифровываем и записываем в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        if(isCartEmpty(cart)){
            $('.emptyCart').html('<h4>Корзина пуста!</h4>');
        }
        else{
            showCart();
        }         
    }
    else{ 
        $('.emptyCart').html('<h4>Корзина пуста!</h4>');
    }
}

//отрисовываем корзину
function showCart(){
    var out = '';
    for(var id in cart){
        out += '<div class="row cartRow cartRow' + id + ' align-items-center"></div>';
        $('.placeForCartRows').html(out);
        init(id);
    }
}

//делаем запрос к серверу, чтобы взять данные единичного экземпляра книни по ее id
function init(idbook){
    $.post("php/book.php", {"id" : idbook}, bookOut);
}

//парсим данные из БД
function bookOut(data){
    data = JSON.parse(data);
    var out='';
    out += '<div class="col"><button onclick="cartDelete(' + data.IDBOOK + ')" class="btn btn-danger btn-sm itemDel"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="8" height="8" data-icon="x" viewBox="0 0 8 8"><path fill="#ffffff" d="M1.406 0l-1.406 1.406.688.719 1.781 1.781-1.781 1.781-.688.719 1.406 1.406.719-.688 1.781-1.781 1.781 1.781.719.688 1.406-1.406-.688-.719-1.781-1.781 1.781-1.781.688-.719-1.406-1.406-.719.688-1.781 1.781-1.781-1.781-.719-.688z" /></svg></button></div>';
    out += '<div class="col"><img class="cartBookImg" src="images/book/' + data.PHOTO + '" alt=""></div>';
    out += '<div class="col-4 cartBookName"><a class="text-secondary" href="singleBookPage.php?idbook=' + data.IDBOOK + '" ><span class="cartBookName">"'+ data.BOOK + '" - ' + data.AUTHORS + '</span></a></div>';
    out += '<div class="col"><div class="cost">' + data.COST + ' ₽</div></div>';
    out += '<div class="col"><button onclick="iMinus(' + data.IDBOOK + ')" class="btn btn-danger btn-sm itemMinus"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="8" height="8" data-icon="minus" data-container-transform="translate(0 3)" viewBox="0 0 8 8"><path fill="#ffffff" d="M0 3v2h8v-2h-8z" /></svg></button></div>';
    out += '<div class="col"><span>' + cart[data.IDBOOK] + '<span></div>';
    out += '<div class="col"><button onclick="iPlus(' + data.IDBOOK + ')" class="btn btn-danger btn-sm itemPlus"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="8" height="8" data-icon="plus" viewBox="0 0 8 8"><path fill="#ffffff" d="M3 0v3h-3v2h3v3h2v-3h3v-2h-3v-3h-2z" /></svg></button></div>';
    out += '<div class="col-2"><div class="cost">' + (cart[data.IDBOOK] * data.COST) + ' ₽</div></div>';
    $('.cartRow' + data.IDBOOK).html(out);
    cost.set(data.IDBOOK, data.COST);
    out = '';
    out += '<div class="col-8 cartBookName"><h5>Итого</h5></div><div class="col"><span>' + totalCountCart() + '<span></div>';
    out += '<div class="col"></div><div class="col-2"><div class="cost">' + totalCostCart() + ' ₽</div></div>';
    $('.totalCart').html(out);
    $('.totalCountMiniCart').html('<span class="totalCountMiniCartStyle">' + totalCountCart() + '</span>');
    $('.checkoutForm').append('<input type=hidden name=' + data.IDBOOK + ' value=' + cart[data.IDBOOK] + '>');
    $('.checkoutForm').on('submit', dyeCart);
}

//добавляем товар в корзину
function cartAdd() {
    var id = $(this).attr('data-id');
    if(cart[id] == undefined){
        cart[id] = 1;
    }
    else{
        cart[id]++;
    }
    saveCart();
    showCart();    
}

//удаляем товар из корзины
function cartDelete(idbook){
    delete cart[idbook];
    cost.delete(idbook);
    saveCart();
    if (cart = {}) location.reload();
    showCart();  
}

//увеличиваем количество товара на единицу
function iPlus(idbook) {
    cart[idbook]++;
    saveCart();
    showCart(); 
}

//уменьшаем количество товара на единицу
function iMinus(idbook) {
    if(cart[idbook] > 1){
        cart[idbook]--;
    }
    else{
        delete cart[idbook];
    }
    saveCart();
    if (cart = {}) location.reload();
    showCart();
}

//проверяем корзину на пустоту: true - пустая, false - нет
function isCartEmpty(object){
    for(var key in object)
    if(object.hasOwnProperty(key)){
        return false;
    }
    return true;
}

//сохраняем изменения в корзине
function saveCart(){
    localStorage.setItem('cart', JSON.stringify(cart));
}

//очищаем корзину
function dyeCart(){
    cart = {};
    saveCart();
    showCart();
}


