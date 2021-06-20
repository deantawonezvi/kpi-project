<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $name
 * @property int $employee_id
 * @property float $expected_completion_time
 * @property float|null $actual_completion_time
 * @property float $expected_output
 * @property float|null $actual_output
 * @property int $importance
 * @property float|null $cost
 * @property int $supervisor
 * @property string $assigned_date
 * @property float $task_expiry
 * @property string|null $started_date
 * @property string|null $completed_date
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereActualCompletionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereActualOutput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereAssignedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCompletedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereExpectedCompletionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereExpectedOutput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereImportance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStartedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereSupervisor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTaskExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TaskOutput
 *
 * @property int $id
 * @property int $task_id
 * @property string $output_type
 * @property string $output_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput whereOutputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput whereOutputValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskOutput whereUpdatedAt($value)
 */
	class TaskOutput extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $mobile
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $type
 * @property string $department
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Yadahan\AuthenticationLog\AuthenticationLog[] $authentications
 * @property-read int|null $authentications_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

