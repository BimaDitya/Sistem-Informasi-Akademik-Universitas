<?php

namespace App\Policies;

use App\Models\Mahasiswa;
use Illuminate\Auth\Access\HandlesAuthorization;
use ;

class MahasiswaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \  $
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny( $)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \  $
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view( $, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \  $
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create( $)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \  $
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( $, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \  $
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore( $, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete( $, Mahasiswa $mahasiswa)
    {
        //
    }
}
