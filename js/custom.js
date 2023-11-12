var language; 
function getLanguage() {
    (localStorage.getItem('language') == null) ? setLanguage('en') : false;
    $.ajax({ url:  './language/' +  localStorage.getItem('language') + '.json', 
        dataType: 'json', 
        async: false, 
        dataType: 'json', 
        success: function (lang) { 
            language = lang;
        }
    });

    $('#nav_buy').text(language.nav_buy);
    $('#nav_marketplace').text(language.nav_marketplace);
    $('#nav_contact').text(language.nav_contact);
    $('#nav_coin').text(language.nav_coin);
    $('#nav_wallet').text(language.nav_wallet);
    $('#nav_create').text(language.nav_create);
    
    $('#first_section_logo').html(language.first_section_logo);
    $('#first_section_title').html(language.first_section_title);
    $('#first_section_description').text(language.first_section_description);
    $('#first_section_button').text(language.first_section_button);

    $('#price_chart_title').text(language.price_chart_title);
    $('#second_section_first').text(language.second_section_first);
    $('#second_section_second').text(language.second_section_second);
    $('#second_section_third').text(language.second_section_third);
    $('#second_section_about_title').html(language.second_section_about_title);
    $('#second_section_about_first').text(language.second_section_about_first);
    $('#second_section_about_second').text(language.second_section_about_second);
    $('#second_section_about_third').text(language.second_section_about_third);
    $('#second_section_about_fourth').text(language.second_section_about_fourth);
    $('#second_section_about_fifth').text(language.second_section_about_fifth);
    $('#second_section_about_sixth').text(language.second_section_about_sixth);
    $('#second_section_about_final').html(language.second_section_about_final);
    $('#second_section_why_title').html(language.second_section_why_title);
    $('#second_section_why_description').html(language.second_section_why_description);
    $('.learn_more').text(language.learn_more);
    $('#second_section_benefit_title').html(language.second_section_benefit_title);
    $('#second_section_benefit_description').text(language.second_section_benefit_description);

    $('#third_section_title').text(language.third_section_title);
    $('#third_section_subtitle').html(language.third_section_subtitle);
    $('#third_section_description').text(language.third_section_description);
    $('#third_section_invest').text(language.third_section_invest);

    $('#fourth_section_title').text(language.fourth_section_title);
    $('#fourth_section_description').html(language.fourth_section_description);
    $('#fourth_section_left_title').text(language.fourth_section_left_title);
    $('#fourth_section_left_slogan').html(language.fourth_section_left_slogan);
    $('#fourth_section_detailed_stats').html(language.fourth_section_detailed_stats);
    $('#fourth_section_profit_title').text(language.fourth_section_profit_title);
    $('#fourth_section_profit_description').text(language.fourth_section_profit_description);

    $('#cta_section_title').text(language.cta_section_title);
    $('#cta_section_description').text(language.cta_section_description);
    $('#Subscribe_button').text(language.Subscribe_button);

    $('#footer_quick_title').text(language.footer_quick_title);
    $('#footer_quick_home').text(language.footer_quick_home);
    $('#footer_quick_buy').text(language.footer_quick_buy);
    $('#footer_quick_marketplace').text(language.footer_quick_marketplace);
    $('#footer_quick_contact').text(language.footer_quick_contact);
    $('#footer_resources_title').text(language.footer_resources_title);
    $('#footer_resources_brochure').text(language.footer_resources_brochure);
    $('#footer_resources_whitepaper').text(language.footer_resources_whitepaper);
    $('#footer_payment_title').text(language.footer_payment_title);
    $('#footer_copyright').html(language.footer_copyright);

    $('#header_section_coin').text(language.header_section_coin);
    $('#header_section_currency').text(language.header_section_currency);

    if (localStorage.getItem('language') == 'de') lang_file = 'de';
    else lang_file = 'en';
    // $('#footer_resources_whitepaper').attr("href", "Whitepaper-"+lang_file+".pdf");
    $('#footer_resources_brochure').attr("href", "brochure-"+lang_file+".pdf");

    // about us page
    $('#about_us_first_section_title').text(language.about_us_first_section_title);
    $('#about_us_first_section_description').text(language.about_us_first_section_description);

    // contact us page
    $('#contact_us_title').text(language.contact_us_title);
    $('#contact_us_invest_amount').text(language.contact_us_invest_amount);
    $('#contact_us_invest_period').text(language.contact_us_invest_period);
    $('#contact_us_description').text(language.contact_us_description);
    $('#contact_us_send_btn').text(language.contact_us_send_btn);

    // wallet create page
    $('#wallet_logo').text(language.wallet_logo);
    $('#wallet_create_title').text(language.wallet_create_title);
    $('#wallet_create_subtitle').text(language.wallet_create_subtitle);
    $('#wallet_create_agree').text(language.wallet_create_agree);
    $('#createbutton').text(language.wallet_create_new_button);
    $('#importbutton').text(language.wallet_create_import_button);
    $('#wallet_create_invite_title').text(language.wallet_create_invite_title);
    $('#wallet_continue').text(language.wallet_continue);
    $('#wallet_close').text(language.wallet_close);

    // wallet generate page
    $('#wallet_generate_title').text(language.wallet_generate_title);
    $('#wallet_generate_subtitle').html(language.wallet_generate_subtitle);
    $('#wallet_generate_first_rule').text(language.wallet_generate_first_rule);
    $('#wallet_generate_second_rule').text(language.wallet_generate_second_rule);
    $('#wallet_generate_third_rule').html(language.wallet_generate_third_rule);
    $('#wallet_generate_fourth_rule').html(language.wallet_generate_fourth_rule);
    $('#wallet_generate_fifth_rule').html(language.wallet_generate_fifth_rule);
    $('#wallet_generate_final_rule').html(language.wallet_generate_final_rule);
    $('#wallet_generate_button').text(language.wallet_generate_button);

    // wallet confirm page
    $('#wallet_confirm_title').html(language.wallet_confirm_title);
    $('#wallet_confirm_subtitle').html(language.wallet_confirm_subtitle);
    $('#wallet_confirm_continue').text(language.wallet_confirm_continue);

    // wallet send page
    $('#wallet_send_title').html(language.wallet_send_title);
    $('#wallet_send_balance').html(language.wallet_send_balance);
    $('.wallet_send_price').text(language.wallet_send_price);
    $('#showAddressButton').text(language.wallet_send_show_button);
    $('#sendButton').text(language.contact_us_send_btn);
    $('#wallet_send_all').text(language.wallet_send_all);
    $('.currency').text(language.header_section_currency);
    $('#wallet_send_receipient').text(language.wallet_send_receipient);
    $('#wallet_send_quantity').text(language.wallet_send_quantity);
    $('#wallet_send_transaction').text(language.wallet_send_transaction);
    $('#cancelButton').text(language.wallet_send_cancel);

    // wallet login page
    $('#wallet_login_title').text(language.wallet_login_title);
    $('#wallet_login_address').text(language.wallet_login_address);
    $('#wallet_login_phrase').text(language.wallet_login_phrase);
    $('#wallet_login_button').text(language.wallet_login_button);
}

function setLanguage(lang) {
    localStorage.setItem('language', lang);
}

$(".lang-select").click(function(e){
    e.preventDefault();
    $(".lang-selected").html($(this).html());
    setLanguage($(this).data("lang"));
    getLanguage();
});

$(document).ready(function(){
    $(".lang-selected").html($(".dropdown-menu").find(`[data-lang='${localStorage.getItem('language')}']`).html());
    getLanguage();
});