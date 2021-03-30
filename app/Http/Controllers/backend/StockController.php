<?php 
 
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;   
use DB; 
use App\User; 
use Session;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\SubSubCategory; 
use App\Model\Brand;
use App\Model\Unit;
use App\Model\Purchase;
use App\Model\Invoice;
use App\Model\InvoiceDetail; 
use App\Model\Payment;
use App\Model\PaymentDetail;
use App\Model\Customer;
use PDF;

class StockController extends Controller
{
    public function stockview(){
	$alldata = Product::orderby('supplier_id','ASC')->orderby('category_id','ASC')->where('status','1')->get();
    return view('backend.stock.view-stock',compact('alldata'));
    }
   
    public function stockpdf(){
    	$data['alldata'] = Product::orderby('supplier_id','ASC')->orderby('category_id','ASC')->get();
    	$pdf = PDF::loadView('backend.pdf.product-by-stock-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('product-by-stock-report.pdf');
    	
    }

      public function supplierstockview(){
	  $products = Product::all();
	  $suppliers = Supplier::all();
	  $categories = Category::all();
	  $subcategories = SubCategory::all();
    return view('backend.stock.supplier-view-stock',compact('products','suppliers','categories','subcategories'));
    }
   
    public function supplierstockpdf(Request $request){
    	$data['alldata'] = Product::orderby('supplier_id','ASC')->orderby('category_id','ASC')->where('supplier_id',$request->supplier_id)->get();
    	$pdf = PDF::loadView('backend.pdf.supplier-by-stock-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('supplier-by-stock-report.pdf');
    	
    }


    public function productstockpdf(Request $request){
    	$data['alldata'] = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->get();
    	$pdf = PDF::loadView('backend.pdf.product-wise-stock-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('product-by-stock-report.pdf');
    	
    }
}
