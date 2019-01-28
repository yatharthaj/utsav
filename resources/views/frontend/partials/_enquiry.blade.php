<div class="row form-row-wrapper">
    <div class="col s2 form-col-wrap">
    </div>
    <div class="col s12 m12 l8 ">
        <div class="collection">
            <form method="POST" action="{{route('frontend-postInquiry')}}" data-parsley-validate>
                @csrf
                <div class="row uk-margin-left uk-padding-small uk-padding-remove-vertical">
                    <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical  uk-margin-small uk-margin-bottom">
                        <input id="hidden" type="hidden" class="validate" name="tourName" value="{{$tour->name}}">
                        <label for="hidden"><h6 class="uk-margin-remove">Quick Enquiry</h6></label>
                    </div>
                </div>

                <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical">
                    <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" type="text" class="validate" name="fullName">
                        <label for="name">Name</label>
                    </div>
                </div>

                <div class="row uk-margin-left uk-margin-right uk-margin-right uk-padding-small uk-padding-remove-vertical">
                    <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">Email</label>
                    </div>
                </div>

                <div class="row uk-margin-left uk-margin-right uk-margin-right uk-padding-small uk-padding-remove-vertical">
                    <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                        <i class="material-icons prefix">phone_android</i>
                        <input id="tel" type="tel" class="validate" name="mobile">
                        <label for="tel">Mobile no.</label>
                    </div>
                </div>

                <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-top">
                    <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                        <i class="fas fa-comments prefix"></i>
                        <textarea id="product-review-textarea" class="materialize-textarea"
                                  name="enquiryMessage"></textarea>
                        <label for="product-review-textarea">Message</label>
                    </div>
                </div>
                <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-top">
                    <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                        <div class="g-recaptcha" data-sitekey="6Lfg0oUUAAAAAIWHzy2gRUwf7WgtoXToFt7HW24N"></div>
                    </div>
                </div>

                <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-top">
                    <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                        <button class="btn waves-effect waves-light basic-button btn-large" type="submit">Send <i
                                    class="material-icons right">send</i></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="col s2">
    </div>
</div>



