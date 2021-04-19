@component('mail::message')
# Du nouveau sur shopify

Un nouveau produit vient d'être ajouté sur votre plateforme Shopify ! 
N'hésitez pas à le consulter en cliquant sur le bouton ci-dessous:

@component('mail::button', ['url' => url('produits')])
voir le produit
@endcomponent

Merci d'avoir choisi Shopify pour votre shopping !<br>
{{ config('app.name') }}
@endcomponent
