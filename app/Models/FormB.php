namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormB extends Model
{
    use HasFactory;

    protected $fillable = [
        'union_name', 'registered_address', 'meeting_date', 'branch',
        'union_type', 'sector', 'industry', 'member_count', 'application_date',
        'meeting_type', 'secretary_name',
    ];
}
