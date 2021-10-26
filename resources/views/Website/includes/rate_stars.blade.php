@for($i = 1; $i<=$rate;$i++)
    <i class="icon_star voted"></i>
@endfor
@for($i = 1; $i<= (5-$rate) ;$i++)
    <i class="icon_star"></i>
@endfor
