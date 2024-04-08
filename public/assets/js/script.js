$(function () {
    /* Open modal */
    $('[data-modal-trigger]').click(function () {
        let triggerModal = $(this).attr('data-modal-trigger');
        $(`#overlay`).removeClass('hidden');
        $(`[data-modal=${triggerModal}]`).removeClass('hidden');
    })

    /* Close Modal */
    $('.close-modal').click(function () {
        $(`#overlay`).addClass('hidden');
        $(this).parents('[data-modal]').addClass('hidden');
    })

    $("#overlay").click(function () {
        $(`#overlay`).addClass('hidden');
        $('[data-modal]').addClass('hidden');
    });
})