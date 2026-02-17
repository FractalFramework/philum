JavaScript Document

async function telephone(url) {
  const reponse = await fetch(url);
  const allo = await reponse.json();
  console.log(allo);
}

function fetch(url){
await fetch("+url+",{
"credentials": "include",
"headers":{
	"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0",
	"Accept": "*/*",
	"Accept-Language": "fr,fr-FR;q=0.9,en-US;q=0.8,en;q=0.7",
	"Content-Type": "multipart/form-data; boundary=----geckoformboundary492700364956fdb7c0f7106669ac2ba7"},
	"referrer": "http://philum.test/",
	"body": "------geckoformboundary492700364956fdb7c0f7106669ac2ba7--\r\n",
	"method": "POST",
	"mode": "cors"});}

function getThumbnailFromRumble(){//let url=URL(string:"https://rumble.com/vxhedt-80000-matches-chain-reaction-domino-effect.html?mref=7ju1&mc=4w36m")!
URLSession.shared.dataTask(with: url){ data, response, error in
guard error == nil else{ return }
guard let httpURLResponse=response as? HTTPURLResponse,
	 httpURLResponse.statusCode == 200,
	 let data=data else{
return}

let str=String(data: data, encoding: .utf8) // get the htm response as string
let prefix="\"thumbnailUrl\":" 
let suffix=",\"uploadDate\""
let matches=str?.match("(\(prefix)(...*)\(suffix))")
if let thumbnailUrlMatch=matches?.first?.first{
let thumbnailUrl=thumbnailUrlMatch
.replacingOccurrences(of: prefix, with: "") // remove prefix from urlstring
.replacingOccurrences(of: suffix, with: "") // remove suffix from urlstring
.replacingOccurrences(of: "\"", with: "") // remove escaping characters from urlstring
if let url=URL(string: thumbnailUrl),
	 let data=try? Data(contentsOf: url){
		 let uiImage=UIImage(data: data)
		 // use the uiimage }}
}.resume()}

extension String{
func match(_ regex: String) -> [[String]]{
	let nsString=self as NSString
	return (try? NSRegularExpression(pattern:regex, options:[]))?.matches(in: self, options: [], range: NSMakeRange(0, nsString.length)).map{
		match in (0..<match.numberOfRanges).map{ match.range(at: $0).location==NSNotFound?"":nsString.substring(with: match.range(at:$0))}}??[]}}