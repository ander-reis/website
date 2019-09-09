<ul class="share-buttons">
    <li>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" target="_blank">
            <img src="{{asset('images/icons/facebook.png')}}" alt="compartilhar no facebook">
        </a>
    </li>
    <li class="d-sm-none">
        <a href="whatsapp://send?text={{url()->full()}}">
            <img src="{{asset('images/icons/whats.png')}}" alt="compartilhar no whatsapp">
        </a>
    </li>
    <li>
        <a href="https://twitter.com/intent/tweet?text={{$noticia->ds_resumo}}&amp;url={{url()->full()}}&amp;via=Sinpro Website"
           target="_blank">
            <img src="{{asset('images/icons/twitter.png')}}" alt="compartilhar no twitter">
        </a>
    </li>
    <li>
        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->full()}}&amp;title={{$noticia->ds_resumo}}"
           target="_blank">
            <img src="{{asset('images/icons/linked.png')}}" alt="compartilhar no linkedin">
        </a>
    </li>
</ul>
