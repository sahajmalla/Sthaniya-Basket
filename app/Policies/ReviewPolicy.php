<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /*

        This policy will determine who can do what with the Review record.
        
        The User parameter will be filled automatically by the Policy.
        
        This will tell Laravel that the ReviewPolicy is attached to the Review model.

        We will have to pass the $review parameter through the authorize('delete', $review) 
        method and in the html pages, through the @can(delete', $review) directive. 

    */

    public function delete(User $user, Review $review) {
        return $user->customers->first()->id === $review->customer_id;
    }
}
