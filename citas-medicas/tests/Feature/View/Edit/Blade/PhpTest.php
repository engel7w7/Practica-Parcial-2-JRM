<?php

it('can render', function () {
    $contents = $this->view('edit.blade.php', [
        //
    ]);

    $contents->assertSee('');
});
