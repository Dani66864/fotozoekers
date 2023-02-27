function validateName() {
    const input = document.getElementById('image_naam').value;
    const boxMessage = document.querySelector('.message-box__naam');
    if(input == 0){
        boxMessage.style.display = "block";
        document.getElementById('image_naam').style.border = "2px solid red";
        return true;
    }else{
        document.getElementById('image_naam').style.border = "2px solid green";
        boxMessage.style.display = "none";
        return false;
    }
}

function validateDes() {
    const input = document.getElementById('beschrijving-img').value;
    const boxMessage = document.querySelector('.message-box__des');
    if(input == 0){
        boxMessage.style.display = "block";
        document.getElementById('beschrijving-img').style.border = "2px solid red";
        return true;
    }else{
        document.getElementById('beschrijving-img').style.border = "2px solid green";
        boxMessage.style.display = "none";
        return false;
    }
}


function validateThema() {
    const themas = document.getElementsByClassName('themas');
    const boxMessage = document.querySelector('.message-box__thema');

    for(i = 0; themas.length; i++){
        if(themas[i].checked == false){
            boxMessage.style.display = "block";
            return true;
        }else{
            boxMessage.style.display = "none";
            return false;
        }
    }
}





function check() {
    var anyChecked = false;
    var form = document.getElementById('upload-images');
    var checkboxes = document.querySelectorAll('#thema');
    for(var i=0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                boxMessage.style.display = "block";
                return true;
            }
    } 
}



function validateFormValidate(){
    if (
        (validateName() || validateDes() || validateThema())
      ){
        const error = document.querySelector('.container-main-error');
        error.style.display = "block";
        setTimeout(function () {
            error.style.display = "none";
          }, 3000);
          return false;
      }else{
        return true;
      }
}

document.querySelectorAll(".custom-select").forEach(selectElement => {
    new CustomSelect(selectElement);
})

const SelectBtn = document.querySelector('.thema-box .select-btn'),
        Items = document.querySelectorAll('.thema-box .item')

SelectBtn.addEventListener('click', () => {
    SelectBtn.classList.toggle('open');
})

Items.forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle("checked");
        let checked = document.querySelectorAll('.thema-box .checked'),
            btnText = document.querySelector('.thema-box .btn-text')
            if(checked && checked.length > 0 && checked.length < 2){
                btnText.innerHTML = `${checked.length} thema geselecteerd`
            }else if(checked && checked.length > 1){
                btnText.innerHTML = `${checked.length} thema's geselecteerd`
            }
            else{
                btnText.innerHTML = "Selecteer een thema"
            }
    })
})


const SelectBtnSub = document.querySelector('.subthema-box .select-btn'),
        ItemsSub = document.querySelectorAll('.subthema-box .item')

SelectBtnSub.addEventListener('click', () => {
    SelectBtnSub.classList.toggle('open');
})

ItemsSub.forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle("checked");
        let checked = document.querySelectorAll('.subthema-box .checked'),
            btnText = document.querySelector('.subthema-box .btn-text')
            if(checked && checked.length > 0 && checked.length < 2){
                btnText.innerHTML = `${checked.length} subthema geselecteerd`
            }else if(checked && checked.length > 1){
                btnText.innerHTML = `${checked.length} subthema's geselecteerd`
            }
            else{
                btnText.innerHTML = "Selecteer een subthema"
            }
           
    })
})


let subitems = document.querySelectorAll('.list-items .item');

function isChcekd(query){
    if(query.classList.contains('checked')){
        document.querySelector('.subthema-box').classList.remove('hidden');
    }else if(!(query.classList.contains('checked'))){
        document.querySelector('.subthema-box').classList.add('hidden');
    }
}

for (let i = 0; i < subitems.length; i++) {
    subitems[0].addEventListener('click', () => {
      isChcekd(subitems[0])
    })
}
