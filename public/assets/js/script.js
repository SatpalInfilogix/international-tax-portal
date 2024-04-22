$(function () {
    /* Open modal */
    $('[data-modal-trigger]').click(function () {
        let triggerModal = $(this).attr('data-modal-trigger');
        $(`#overlay`).removeClass('hidden');
        $('body').addClass('overflow-y-hidden');
        $(`[data-modal=${triggerModal}]`).removeClass('hidden');
    })

    /* Close Modal */
    $('.close-modal').click(function () {
        $(`#overlay`).addClass('hidden');
        $('body').removeClass('overflow-y-hidden');
        $(this).parents('[data-modal]').addClass('hidden');
    })

    $("#overlay").click(function () {
        $(`#overlay`).addClass('hidden');
        $('body').removeClass('overflow-y-hidden');
        $('[data-modal]').addClass('hidden');
    });
})