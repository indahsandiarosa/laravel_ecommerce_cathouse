namespace App\Http\Controllers;

use App\Models\Kucing; // Model untuk mengambil data kucing
use Illuminate\Http\Request;

class AdopsiKucingController extends Controller
{
    public function index()
    {
        $kucing = Kucing::all(); // Mengambil semua data kucing
        return view('adopsi_kucing.index', ['kucing' => $kucing]); // Pastikan view ada
    }
}