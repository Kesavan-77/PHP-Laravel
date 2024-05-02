@extends('layouts.template')

@section('page', $id)

@section('blogs')
<div class="news-item">
    <a href="/blog/{{$id}}"><h2>{{$id}}</h2></a>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere. Mauris eu est sed justo hendrerit fermentum id ac leo. Fusce vehicula dolor arcu, sit amet tempor ex feugiat eu. Nulla facilisi. Sed auctor enim ut nisi volutpat, nec blandit urna efficitur. Nullam tincidunt, mi ut ultricies fermentum, purus lorem venenatis libero, sed sodales orci arcu a turpis. Nullam accumsan aliquam ex, sit amet ullamcorper eros convallis non. Cras nec vehicula purus.
    </p>
    <p>
        Vivamus eleifend ex id nulla pretium, a consequat elit elementum. Sed vitae vestibulum metus, nec aliquet velit. Cras efficitur magna id purus sollicitudin vestibulum. Fusce eget ipsum et nunc cursus luctus id eget eros. Suspendisse tempus ante sit amet lacus viverra euismod. Nam pharetra sapien et sem sagittis, vel aliquam risus dictum. Nam eget tincidunt velit. Donec consectetur velit in odio scelerisque varius. Integer dapibus urna libero, ac fringilla dolor congue nec. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ut mauris libero. Ut fermentum tincidunt leo eget varius. Phasellus dictum scelerisque elit, non dapibus felis volutpat nec. Fusce gravida leo vel tortor scelerisque, quis rutrum justo fermentum.
    </p>
    <p>
        Morbi in libero quis sapien placerat tristique vel et elit. Aliquam id mauris in dolor ullamcorper bibendum. Curabitur mollis, sapien eu suscipit lobortis, elit lectus viverra odio, id feugiat felis mauris id odio. Integer et interdum justo. Cras lacinia mauris ut elit vestibulum aliquet. Fusce sit amet erat mi. Nam vehicula velit sit amet finibus congue. Nulla facilisi. Ut vel orci at lorem bibendum lacinia nec eget orci. Sed aliquam, nulla eget accumsan blandit, tellus arcu gravida orci, vel vestibulum libero ligula sit amet metus. Vestibulum rhoncus faucibus justo. Integer non sapien vel neque aliquet pharetra. Proin sagittis, neque nec cursus facilisis, justo ligula eleifend quam, ac luctus urna justo ut nisi. Vestibulum id vestibulum risus, ut dignissim orci.
    </p>
</div>
@endsection