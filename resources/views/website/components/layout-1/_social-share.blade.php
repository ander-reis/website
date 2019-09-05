<ul class="share-buttons">
    <li>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" target="_blank">
            <img src="{{asset('fonts/icons/facebook.svg')}}" alt="compartilhar no facebook">
        </a>
    </li>
    <li>
        <a href="https://web.whatsapp.com/send?text={{url()->full()}}" target="_blank">
            <img src="{{asset('fonts/icons/whatsapp.svg')}}" alt="compartilhar no whatsapp">
        </a>
    </li>
    <li>
        <a href="https://twitter.com/intent/tweet?text={{$noticia->ds_resumo}}&amp;url={{url()->full()}}&amp;via=Sinpro Website" target="_blank">
            <img src="{{asset('fonts/icons/twitter.svg')}}" alt="compartilhar no twitter">
        </a>
    </li>
    <li>
        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->full()}}&amp;title={{$noticia->ds_resumo}}" target="_blank">
            <img src="{{asset('fonts/icons/linkedin.svg')}}" alt="compartilhar no linkedin">
        </a>
    </li>
</ul>
