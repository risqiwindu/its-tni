@include('admin.partials.color-picker',['name'=>'slider_background','label'=>__('te.background-color')])

@for($i=1;$i <= 10; $i++)

<div class="card">
    <div class="card-header">
        @lang('te.image') {{ $i }}
    </div>
    <div class="card-body">
        @include('admin.partials.image-input',['name'=>'file'.$i,'label'=>__('te.image').' (1600 x 680)'])
        <div class="row">
            <div class="col-md-12">
                @include('admin.partials.text-input',['name'=>'slide_heading'.$i,'label'=>__('te.slide-heading')])
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('admin.partials.text-input',['name'=>'sub_heading'.$i,'label'=>__('te.sub-heading')])
            </div>
            <div class="col-md-6">
                @include('admin.partials.color-picker',['name'=>'heading_font_color'.$i,'label'=>__t('heading-color')])
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                @include('admin.partials.text-input',['name'=>'slide_text'.$i,'label'=>__('te.slide-text')])
            </div>
            <div class="col-md-6">
                @include('admin.partials.color-picker',['name'=>'text_font_color'.$i,'label'=>__t('text-color')])
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <h5>{{ __t('button') }} 1</h5>
                @include('admin.partials.text-input',['name'=>'button_1_text'.$i,'label'=>__t('button-text')])
                @include('admin.partials.text-input',['name'=>'url_1'.$i,'label'=>__t('link')])
            </div>
            <div class="col-md-6">
                <h5>{{ __t('button') }} 2</h5>
                @include('admin.partials.text-input',['name'=>'button_2_text'.$i,'label'=>__t('button-text')])
                @include('admin.partials.text-input',['name'=>'url_2'.$i,'label'=>__t('link')])
            </div>
        </div>



    </div>
</div>
<hr/>
<br/>

@endfor
