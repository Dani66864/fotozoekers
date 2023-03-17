<input type="checkbox" checked name="" id="checkin">
<button class="click-btn">
    <span>ZoekBalk</span>
    <i class="fa-solid fa-magnifying-glass"></i>
</button>
<a href="<?php URLROOT ?>index" class="home">
    <i class="fa-solid fa-house"></i>Home
</a>
<label for="close" id="search-balk">
    <div class="filter-container">
        <i class="fa-sharp fa-solid fa-circle-xmark exit-btn"></i>
        <h1>Filter</h1>
        <form method='POST' class="widget" action='search'>
            <div class="naam">
                <label for="">Foto naam</label>
                <input type='text' name='foto_naam'>
            </div>
            <div class="select-btn">
                <span class="btn-text">Select language</span>
                <span class="arrow-dwn">
                    <i class="fa-sharp fa-solid fa-chevron-down"></i>
                </span>
            </div>
            <ul class="list-items">
                <li class="item">
                    <a href="<?php URLROOT ?>search"><span class="item-text">Filters wissen</span></a>
                </li>
                <li class='item'>
                    <span class='checkbox'>
                        <i class='fa-sharp fa-solid fa-chevron-down'></i>
                        <input id='fa-check' type='checkbox' name='list' value='$record->themaname'>
                    </span>
                    <span class='item-text'>naam</span>
                </li>
                <li class='item'>
                    <span class='checkbox'>
                        <i class='fa-sharp fa-solid fa-chevron-down'></i>
                        <input id='fa-check' type='checkbox' name='list' value='$record->themaname'>
                    </span>
                    <span class='item-text'>naam</span>
                </li>
                <li class='item'>
                    <span class='checkbox'>
                        <i class='fa-sharp fa-solid fa-chevron-down'></i>
                        <input id='fa-check' type='checkbox' name='list' value='$record->themaname'>
                    </span>
                    <span class='item-text'>naam</span>
                </li>

            </ul>

            <button type='submit'>Zoeken</button>
        </form>
    </div>
</label>