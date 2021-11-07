<?php

namespace App\Policies;

use App\Models\Address;
use Illuminate\Auth\Access\HandlesAuthorization;
use ;

class AddressPolicy
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
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view( $, Address $address)
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
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( $, Address $address)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $, Address $address)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \  $
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore( $, Address $address)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete( $, Address $address)
    {
        //
    }
}
