<?php

namespace App\Policies;

use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;
use ;

class StudentPolicy
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view( $, Student $student)
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( $, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \  $
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore( $, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete( $, Student $student)
    {
        //
    }
}
