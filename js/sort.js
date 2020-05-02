//функция для сортировки элементов по стоимости в порядке убывания
function costDESCsort(){
    //получаем элемент с карточками товара
    let sortRow = document.querySelector('#sortRow');
    //сортироваться будут карточки, которые мы определяем как детей элемента sortRow
    for(let i = 0; i < sortRow.children.length; i++){
        for(let j = i; j < sortRow.children.length; j++){
            if(+sortRow.children[i].getAttribute('data-cost') > +sortRow.children[j].getAttribute('data-cost')){
                //перезаписываем исходный элемент
                replaceNode = sortRow.replaceChild(sortRow.children[j], sortRow.children[i]);
                //меняем исходный элемент на новый
                insertAfter(replaceNode, sortRow.children[i]);
            }
        }
    }
    $('.sortType').html(', отсортировано по цене (по убыванию)');
}

//функция для сортировки элементов по стоимости в порядке возрастания
function costASCsort(){
    //получаем элемент с карточками товара
    let sortRow = document.querySelector('#sortRow');
    //сортироваться будут карточки, которые мы определяем как детей элемента sortRow
    for(let i = 0; i < sortRow.children.length; i++){
        for(let j = i; j < sortRow.children.length; j++){
            if(+sortRow.children[i].getAttribute('data-cost') < +sortRow.children[j].getAttribute('data-cost')){
                //перезаписываем исходный элемент
                replaceNode = sortRow.replaceChild(sortRow.children[j], sortRow.children[i]);
                //меняем исходный элемент на новый
                insertAfter(replaceNode, sortRow.children[i]);
            }
        }
    }
    $('.sortType').html(', отсортировано по цене (по возрастанию)');
}

//функция для сортировки элементов по году издания в порядке убывания
function yearDESCsort(){
    //получаем элемент с карточками товара
    let sortRow = document.querySelector('#sortRow');
    //сортироваться будут карточки, которые мы определяем как детей элемента sortRow
    for(let i = 0; i < sortRow.children.length; i++){
        for(let j = i; j < sortRow.children.length; j++){
            if(+sortRow.children[i].getAttribute('data-year') > +sortRow.children[j].getAttribute('data-year')){
                //перезаписываем исходный элемент
                replaceNode = sortRow.replaceChild(sortRow.children[j], sortRow.children[i]);
                //меняем исходный элемент на новый
                insertAfter(replaceNode, sortRow.children[i]);
            }
        }
    }
    $('.sortType').html(', отсортировано по году издания (по убыванию)');
}

//функция для сортировки элементов по году издания в порядке возрастания
function yearASCsort(){
    //получаем элемент с карточками товара
    let sortRow = document.querySelector('#sortRow');
    //сортироваться будут карточки, которые мы определяем как детей элемента sortRow
    for(let i = 0; i < sortRow.children.length; i++){
        for(let j = i; j < sortRow.children.length; j++){
            if(+sortRow.children[i].getAttribute('data-year') < +sortRow.children[j].getAttribute('data-year')){
                //перезаписываем исходный элемент
                replaceNode = sortRow.replaceChild(sortRow.children[j], sortRow.children[i]);
                //меняем исходный элемент на новый
                insertAfter(replaceNode, sortRow.children[i]);
            }
        }
    }
    $('.sortType').html(', отсортировано по году издания (по возрастанию)');
}

//функция для сортировки элементов по популярности в порядке убывания
function popularityDESCsort(){
    //получаем элемент с карточками товара
    let sortRow = document.querySelector('#sortRow');
    //сортироваться будут карточки, которые мы определяем как детей элемента sortRow
    for(let i = 0; i < sortRow.children.length; i++){
        for(let j = i; j < sortRow.children.length; j++){
            if(+sortRow.children[i].getAttribute('data-popularity') > +sortRow.children[j].getAttribute('data-popularity')){
                //перезаписываем исходный элемент
                replaceNode = sortRow.replaceChild(sortRow.children[j], sortRow.children[i]);
                //меняем исходный элемент на новый
                insertAfter(replaceNode, sortRow.children[i]);
            }
        }
    }
    $('.sortType').html(', отсортировано по популярности (по убыванию)');
}

//функция для сортировки элементов по популярности в порядке возрастания
function popularityASCsort(){
    //получаем элемент с карточками товара
    let sortRow = document.querySelector('#sortRow');
    //сортироваться будут карточки, которые мы определяем как детей элемента sortRow
    for(let i = 0; i < sortRow.children.length; i++){
        for(let j = i; j < sortRow.children.length; j++){
            if(+sortRow.children[i].getAttribute('data-popularity') < +sortRow.children[j].getAttribute('data-popularity')){
                //перезаписываем исходный элемент
                replaceNode = sortRow.replaceChild(sortRow.children[j], sortRow.children[i]);
                //меняем исходный элемент на новый
                insertAfter(replaceNode, sortRow.children[i]);
            }
        }
    }
    $('.sortType').html(', отсортировано по популярности (по возрастанию)');
}

//функция получает элемент, определяет его родителя и вставляет перед ним необходимое значение
function insertAfter(oldelement, newelement){
    //console.log(`Старый: ${oldelement}, новый: ${newelement}`);
    return newelement.parentNode.insertBefore(oldelement, newelement.nextSibling);
}