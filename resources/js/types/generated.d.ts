declare namespace App.Data {
    export type PostData = {
        id: number;
        text: string;
        image: string | null;
        created_at: string;
        comments?: Array<any>;
        user: any;
    };
}
