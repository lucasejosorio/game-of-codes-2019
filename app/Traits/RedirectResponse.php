<?php


namespace App\Traits;


trait RedirectResponse
{
    /**
     * Redirect user back with errors
     *
     * @param array $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectBackWithErrors(array $message)
    {
        return redirect()
            ->back()
            ->withErrors($message);
    }

    /**
     * Redirect user back with a successful message
     *
     * @param array $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectBackSuccessful(array $message)
    {
        return redirect()
            ->back()
            ->with($message);
    }
}