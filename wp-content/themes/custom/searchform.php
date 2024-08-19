<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label>
        <input type="search" class="search-field" placeholder="Поиск..." value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">Искать</button>
</form>
