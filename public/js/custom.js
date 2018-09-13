 $(document).ready(function(){
    function mobileResponsiveParagraphCollapse() {
        var parent = $(".paragraph-collapsible");
        var element = parent.find("p:nth-child(odd)");
        var collapseAll = $(".expand-all");
        collapseAll.click(function(){
            $(this).parent().next().find("p:nth-child(even)").slideUp();
            $(this).parent().next().find("p:nth-child(odd)").removeClass("shown");
            $(this).toggleClass("expanded");
            if($(this).hasClass("expanded")){
                $(this).html('Collapse All <i class="fa fa-angle-up"></i>');
                $(this).parent().next().find("p:nth-child(even)").slideDown();
                $(this).parent().next().find("p:nth-child(odd)").addClass("shown");
            }else{
                $(this).html('Expand All <i class="fa fa-angle-down"></i>');
                $(this).parent().next().find("p:nth-child(even)").slideUp();
                $(this).parent().next().find("p:nth-child(odd)").removeClass("shown");
            }
        });
        parent.find("p:nth-child(even)").not($(".shown").next()).hide();
        element.click(function() {
            parent.find("p:nth-child(odd)").not($(this)).removeClass("shown");
            parent.find("p:nth-child(even)").not($(this).next()).slideUp();
            $(this).toggleClass("shown");
            $(this).next().slideToggle();
            $(this).parent().prev().find(".expand-all").html('Expand All <i class="fa fa-angle-down"></i>')
        });
    }
    mobileResponsiveParagraphCollapse();
    function limitCharacters(){
        $(".limit-characters").each(function(){
            var element = $(this);
            var limitCharacters = {
                elementText : element.text().trim(),
                charactersAccepted : element.attr("data-characters") || 200,
                newParagraph : $('<p class="newPara"></p>'),
                buttonType : element.attr("data-buttonType")
            };
            limitCharacters.limitedText = limitCharacters.elementText.substr(0,limitCharacters.charactersAccepted);
            element.append(limitCharacters.newParagraph);
            element.children().not(".newPara").hide();
            limitCharacters.newParagraph.append(limitCharacters.limitedText);
            if(limitCharacters.elementText.length<200){
                limitCharacters.buttonElement.hide();
            }
            if(limitCharacters.buttonType == "attached"){
                limitCharacters.buttonElement = $('<a class="attached" href="#">...read more</a>');
                limitCharacters.button = limitCharacters.buttonElement;
                limitCharacters.newParagraph.append(limitCharacters.buttonElement);
            }else{
                limitCharacters.buttonElement = $('<div class="visible-block"><a href="#" class="btn btn-xs btn-primary ">Read More</a></div>');
                limitCharacters.button = limitCharacters.buttonElement.find("a");
                element.append(limitCharacters.buttonElement);
            }
            limitCharacters.button.click(function(e){
                limitCharacters.newParagraph.slideToggle(300);
                element.children().not(".newPara").slideToggle(300);
                $(this).toggleClass("expanded");
                if($(this).hasClass("attached")){
                    if($(this).hasClass("expanded")){
                        $(this).html("...read less");
                        $(this).parent().prev().append($(this));
                    }else{
                        $(this).html("...read more");
                        limitCharacters.newParagraph.append($(this));
                    }
                }else{
                    if($(this).hasClass("expanded")){
                        $(this).html("Read Less");
                    }
                    else{
                        $(this).html("Read More");
                    }
                }
                e.preventDefault();
            });
        });
    }
    limitCharacters();
    function scrollToElement(){
        var element = {
            scroller : $(".scroller")
        }
        element.scroller.click(function(e){
            element.scrollDestination = $($(this).attr("data-destination")) || $("body");
            element.scrollTime = parseInt($(this).attr("data-scrolltime")) || 0;
            element.scrollExclusion = parseInt($(this).attr("data-scrollExclusion")) || 0;
            $("html,body").animate({scrollTop:element.scrollDestination.offset().top - element.scrollExclusion},element.scrollTime);
            if($(this).hasClass("and-click")){
                element.scrollDestination.click();
            } 
            e.preventDefault();
        });
    }
    scrollToElement();
    function cloneForms(){
        var cloneForm = {
            form : $("#bookingForm"),
            tNo : $("#travellerNo"),
            formSet : $("#parent"),
        };
        /*cloneForm.form.find("fieldset").hide();*/
        cloneForm.tNo.on("keyup change",function(e){
            cloneForm.tValue = parseInt($(this).val());
            cloneForm.form.find("fieldset").show();
            cloneForm.formSet.hide();
            $("[id*='child']").not(cloneForm.formSet).remove();
            for(var i =0; i < cloneForm.tValue; i++){
                cloneForm.formSet.find("legend").html("Details of traveller " + (i+1));
                cloneForm.clones = cloneForm.formSet.clone().insertBefore(cloneForm.formSet).attr("id","child"+i);
                cloneForm.clones.css("display","block").find(".radio input").attr("name","insurance[" + i + "]");
                cloneForm.clones.not("#child0").find(".form-control").not("#title").not("#fName").not("#lName").removeAttr("required");
                cloneForm.clones.not("#child0").find(".form-control").val("");
                /*cloneForm.clones.find(".form-group .date-picker").attr("id","").removeClass("hasDatepicker").removeData().off().datepicker();*/
                /* $("#submitBtns").css("display","flex");*/
            }
        });
        cloneForm.form.submit(function(){
            $("#parent").remove();
        })
    }
    cloneForms();
});

