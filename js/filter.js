const SelectBtnMain = document.querySelector('.filter-container .select-btn'),
        ItemsSubMain = document.querySelectorAll('.filter-container .item')
        console.log(SelectBtnMain, ItemsSubMain)

SelectBtnMain.addEventListener('click', () => {
    SelectBtnMain.classList.toggle('open');
})

ItemsSubMain.forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle("checked");
        let checked = document.querySelectorAll('.filter-container .checked'),
            btnText = document.querySelector('.filter-container .btn-text')

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